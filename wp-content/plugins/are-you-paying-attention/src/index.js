import "./index.scss";
import {
  TextControl,
  Flex,
  FlexBlock,
  FlexItem,
  Button,
  Icon,
} from "@wordpress/components";

wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
  title: "Are You Paying Attention?",
  icon: "smiley",
  category: "common",
  attributes: {
    skyColor: { type: "string" },
    grassColor: { type: "string" },
  },
  edit: EditComponent,
  save: function (props) {
    return null;
  },
});

function EditComponent(props) {
  function updateSkyColor(event) {
    props.setAttributes({ skyColor: event.target.value });
  }

  function updateGrassColor(event) {
    props.setAttributes({ grassColor: event.target.value });
  }

  return (
    <div className="paying-attention-edit-block">
      <TextControl style={{ fontSize: "20px" }} label="Question:" />
      <p style={{ fontSize: "13px", margin: "20px 0 8px 0" }}>Answers:</p>
      <Flex>
        <FlexBlock>
          <TextControl />
        </FlexBlock>
        <FlexItem>
          <Button>
            <Icon icon="star-empty" className="mark-as-correct" />
          </Button>
        </FlexItem>
        <FlexItem>
          <Button isLink className="attention-delete">
            Delete
          </Button>
        </FlexItem>
      </Flex>
      <Button isPrimary>Add an option</Button>
    </div>
  );
}
